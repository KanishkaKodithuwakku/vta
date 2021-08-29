<?php

namespace App\Http\Controllers;
use App\Http\Requests\TransactionCreateRequest;
use App\Http\Requests\TransactionUpdateRequest;
use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //  dd($request);

        $where = [];
        $filters = [];

        if ($request->has('project') && !empty($request->get('project'))) {
            $where['item_id'] = $request->get('item');
            $filters['Item'] = $this->item->show($request->get('item'))->name;
        }

        $transactions = Transaction::paginate(15);
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request  $request)
    {
       // dd('Test');
        $id = $request->activity_id;
        return view('transaction.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionCreateRequest $request)
    {
        if(Transaction::create($request->all())){
            return redirect('/transaction')->with('success', 'Transaction is successfully saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

       // dd( $transactions);

        if (!is_null($transaction)) {
            return view('transaction.view', compact('transaction'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        if (!is_null($transaction)) {
            return view('transaction.edit', compact('transaction'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionUpdateRequest $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        if($transaction->update($request->all())){
            return redirect('/transaction')->with('success', 'Transaction is successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        if (!is_null($transaction)) {
            $transaction->delete();
        }

        return redirect('/transaction')->with('success', 'transaction is successfully deleted');
    }
}
