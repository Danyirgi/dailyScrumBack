<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scrum;

class ScrumController extends Controller
{
    public function index($limit = 10, $offset = 0)
   {
       $data["count"] = scrum::count();
       $daily_scrum = array();

        foreach(scrum::take($limit)->skip($offset)->get() as $p) {
            $item = [
                "id"               => $p->id,
                "id_users"      => $p->id_users,
                "team"        => $p->team,
                "activity_yesterday"            => $p->activity_yesterday,
                "activity_today"            => $p->activity_today,
                "problem_yesterday"            => $p->problem_yesterday,
                "solution"            => $p->solution,
                'created_at'       => $p->created_at,
				'updated_at'       => $p->updated_at,
            ];
            array_push($daily_scrum, $item);
        }
        $data["daily_scrum"] = $daily_scrum;
        $data["status"] = 1;
        return response($data);
   }

   public function store(Request $request)
   {
       $daily_scrum = new scrum([
           'id_users'         => $request->id_users,
           'team'           => $request->team,
           'activity_yesterday'               => $request->activity_yesterday,
           'activity_today'               => $request->activity_today,
           'problem_yesterday'               => $request->problem_yesterday,
           'solution'               => $request->solution,
       ]);

       $daily_scrum->save();
       return response()->json([
        'status'  => '1',
        'message' => 'Data daily_scrum Berhasil Ditambahkan'
       ]);
   }

   public function show($id)
   {
       $daily_scrum = scrum::where('id', $id)->get();

       $datadaily_scrum = array();
       foreach($daily_scrum as $p) {
            $item = [
                "id"               => $p->id,
                "id_users"      => $p->id_users,
                "team"        => $p->team,
                "activity_yesterday"            => $p->activity_yesterday,
                "activity_today"            => $p->activity_today,
                "problem_yesterday"            => $p->problem_yesterday,
                "solution"            => $p->solution,
            ];
            array_push($datadaily_scrum, $item);
       }

       $data["Data daily_scrum"] = $datadaily_scrum;
       $data["status"] = 1;
       return response($data);
   }

   public function destroy($id)
   {
        $daily_scrum = scrum::where('id', $id)->first();

        $daily_scrum->delete();

        return response()->json([
            'status'  => '1',
            'message' => 'Data daily_scrum Berhasil Dihapus'
        ]);
   }
}
