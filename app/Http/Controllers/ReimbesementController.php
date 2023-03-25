<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Reimbesement;
use App\Model\ReimbesementDetail;
use Carbon\Carbon;
use DB;
use DomPDF;

class ReimbesementController extends Controller
{

    public function index()
    {
        $data['users'] = User::find(1);
        $data['reimbesements'] = Reimbesement::with(['details','get_total'])->where('deleted_at', NULL)->filter(request(['from', 'to']))->orderBy('reimbesement_date','desc')->get();
        return view('pages.reimbesement', $data);
    }

    public function create()
    {
        $data['users'] = User::find(1);

        return view('pages.reimbesement-create', $data);
    }


    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'outlet_name' => "required",
    //         'reimbesement_date'=>'required',
    //         // 'image'=>'file|image|mimes:jpg,jpeg,png',
    //     ]);

    //     $reimbesement = New Reimbesement();
    //     $reimbesement->person = $request->name;
    //     $reimbesement->position = $request->position;
    //     $reimbesement->penempatan = $request->penempatan;
    //     $reimbesement->reimbesement_date = $request->reimbesement_date;
    //     $reimbesement->outlet_name = $request->outlet_name;
    //     $reimbesement->save();

    //     if($reimbesement->save()){
    //         foreach ($request->keterangan as $key => $value) {
    //             if ($request->keterangan[$key] && $request->nominal[$key]) {
    //                 $detail = New ReimbesementDetail();
    //                 $detail->keterangan = $request->keterangan[$key];
    //                 $detail->nominal = $request->nominal[$key];

    //                 // dd($request->image[$key]);

    //                 if(!empty($request->image[$key])){
    //                     $imageName = NULL;
    //                     $imageName = time().'.'.$request->image[$key]->getClientOriginalName();
    //                     $request->image[$key]->move(public_path('media/photos'), $imageName);

    //                     $detail->image = $imageName;
    //                 }

    //                 $detail->reimbesement_id = $reimbesement->id;
    //                 $detail->save();
    //             }
    //         }

    //     }

    //     return redirect()->route('reimbesement');

    // }

    public function store(Request $request)
    {
        $this->validate($request,[
            'outlet_name' => "required",
            'reimbesement_date'=>'required',
            // 'image'=>'file|image|mimes:jpg,jpeg,png',
        ]);

        $reimbesement = New Reimbesement();
        $reimbesement->person = $request->name;
        $reimbesement->position = $request->position;
        $reimbesement->penempatan = $request->penempatan;
        $reimbesement->reimbesement_date = $request->reimbesement_date;
        $reimbesement->outlet_name = $request->outlet_name;
        $reimbesement->save();

        $detail = New ReimbesementDetail();

        if ($request->hasFile('image_1')){
            $imageName = NULL;
            $imageName = time().'.'.$request->image_1->getClientOriginalName();
            $request->image_1->move(public_path('media/photos'), $imageName);
            $detail->image_1 = $imageName;
        }
        if ($request->hasFile('image_2')){
            $imageName = NULL;
            $imageName = time().'.'.$request->image_2->getClientOriginalName();
            $request->image_2->move(public_path('media/photos'), $imageName);
            $detail->image_2 = $imageName;
        }
        if ($request->hasFile('image_3')){
            $imageName = NULL;
            $imageName = time().'.'.$request->image_3->getClientOriginalName();
            $request->image_3->move(public_path('media/photos'), $imageName);
            $detail->image_3 = $imageName;
        }

        $detail->berangkat = $request->berangkat;
        $detail->nominal_1 = $request->jarak_1 * 2500;
        $detail->pulang = $request->pulang;
        $detail->nominal_2 = $request->jarak_2 * 2500;
        $detail->makan = $request->makan;
        $detail->nominal_3 = $request->nominal_3;
        $detail->total = $detail->nominal_1 + $detail->nominal_2 + $detail->nominal_3;
        $detail->reimbesement_id = $reimbesement->id;
        $detail->save();


        return redirect()->route('reimbesement');

    }


    public function show($id)
    {
        //
        $data['users'] = User::find(1);
        $data['reimbesements'] = Reimbesement::with(['details','get_total'])->where('deleted_at', NULL)->where('id',$id)->first();
        return view('pages.reimbesement-show', $data);
    }


    public function edit($id)
    {
        $data['users'] = User::find(1);
        $data['reimbesements'] = Reimbesement::with(['details','get_total'])->where('deleted_at', NULL)->where('id',$id)->first();
        return view('pages.reimbesement-edit', $data);
    }


    public function update(Request $request)
    {

        $reimbesement = Reimbesement::find($request->id);
        $reimbesement->reimbesement_date = $request->reimbesement_date;
        $reimbesement->outlet_name = $request->outlet_name;
        $reimbesement->save();

        DB::statement("DELETE FROM reimbesement_details WHERE reimbesement_id =".$request->id);

        if($reimbesement->save()){
            foreach ($request->keterangan as $key => $value) {
                if ($request->keterangan[$key] && $request->nominal[$key]) {
                    $detail = New ReimbesementDetail();
                    $detail->keterangan = $request->keterangan[$key];
                    $detail->nominal = $request->nominal[$key];

                    if(!empty($request->image[$key]) || ($request->image[$key] != NULL)){
                        $imageName = NULL;
                        $imageName = time().'.'.$request->image[$key]->getClientOriginalName();
                        $request->image[$key]->move(public_path('media/photos'), $imageName);

                        $detail->image = $imageName;
                    }

                    $detail->reimbesement_id = $request->id;
                    $detail->save();
                }
            }

        }

        return redirect()->route('reimbesement');
    }

    public function destroy(Request $request)
    {
        $reimbesement = Reimbesement::find($request->id);
        $reimbesement->deleted_at = Carbon::Now();
        $reimbesement->save();

        return redirect()->route('reimbesement');
    }

    public function pdf($id = NULL, $protect = false, $generate = false)
    {
        $data['users'] = User::find(1);
        $data['reimbesements'] = Reimbesement::with(['details','get_total'])->where('deleted_at', NULL)->filter(request(['from', 'to']))->orderBy('reimbesement_date','asc')->get();

        $pdf = DomPDF::loadView('pages.reimbesement-print', $data);
        $pdf->setPaper('a4', 'potrait');

        if ($protect) {
            $pdf->setEncryption('12345678');
        }

        if ($generate) {
            return $pdf;
        }

        return $pdf->stream();
    }

    public function print(Request $request)
    {
        $data['users'] = User::find(1);
        $data['reimbesements'] = Reimbesement::with(['details','get_total'])->where('deleted_at', NULL)->filter(request(['from', 'to']))->orderBy('reimbesement_date','asc')->get();
        return view('pages.reimbesement-print', $data);
    }
}
