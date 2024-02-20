<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Resident;
use App\Models\Uri;
use App\Models\LinkedUri;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    protected $parcel;
    protected $resident;
    protected $uri;
    protected $linkeduri;

    public function __construct(Parcel $parcel, Resident $resident, Uri $uri, LinkedUri $linkeduri)
    {
        $this->parcel = $parcel;
        $this->resident = $resident;
        $this->uri = $uri;
        $this->linkeduri = $linkeduri;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->parcel->getParcel();
        return view('data.parcel.allParcel', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataResidents = Resident::all();
        $dataURI = Uri::all();
        return view('data.parcel.addParcel', ['residents_table' => $dataResidents, 'uri_table' => $dataURI]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ambil data dari request
        $parcel_id = $request->input('parcel_id');
        $parcelName = $request->input('parcelName');
        $parcelOccupant = $request->input('parcelOccupant');
        // Cek duplikat parcel_id
        if (Parcel::where('parcel_id', $parcel_id)->exists()) {
            return redirect()->back()->withInput()->with('error', 'Parcel id already exists');
        }
        Parcel::create([
            'parcel_id'     => $parcel_id,
            'parcel_name'     => $parcelName,
            'parcel_occupant'   => $parcelOccupant,
        ]);
        // Simpan data ke dalam tabel linked_uri
        foreach ($request->input('multiSelectTag', []) as $tagId) {
            LinkedUri::create([
                'parcel_id' => $parcel_id,
                'id_keyword' => $tagId,
            ]);
        }
        return redirect()->route('parcel.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Parcel  $parcel_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($parcel_id)
    {
        try {
            $parcel = Parcel::where('parcel_id', $parcel_id)->first();
            $parcel->delete();
            return redirect()->route('parcel.index')->with('success', 'Data deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data delete failed');
        }
    }
}
