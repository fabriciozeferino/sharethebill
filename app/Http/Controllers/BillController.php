<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Status;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bills = new Bill;

        return view('bills.index', [
            'users' => User::all(),
            'types' => Type::all(),
            'statuses' => Status::all(),
            'bills' => $bills->shares()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $bill = new Bill;
        $bill->type_id = $request->type_id;
        $bill->status_id = 1;
        $bill->save();

        $data = [];

        foreach ($request->amount as $key => $amount) {

            $data[] = [
                'user_id' => $key,
                'bill_id' => $bill->id,
                'spend' => $amount['spend'],
                'paid' => $amount['paid']
            ];
        }

        $bill->users()->attach($data);

        return redirect('/bills');
    }

    /**
     * Display the specified resource.
     *
     * @param Bill $bill
     * @return Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bill $bill
     * @return Response
     */
    public function edit(Bill $bill)
    {
        return view('bills.edit', [
            //'types' => Type::all(),
            'type' => $bill->type()->first(),
            'users' => $bill->users()->get(),
            'bill' => $bill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bill $bill
     * @return Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bill $bill
     * @return Response
     */
    public function destroy(Bill $bill)
    {
        $bill->forceDelete();

        return redirect('/bills');
    }

    /**
     * Show all opened bills
     */
    public function opened()
    {
        $bills = new Bill;

        return [
            'opened' => $bills->opened()
        ];
    }

    /**
     * Show all opened bills
     */
    public function close()
    {
        $bills = new Bill;

        $bills->where('status_id', 1)->update(['status_id' => 2]);

        return redirect('/bills');

    }
}
