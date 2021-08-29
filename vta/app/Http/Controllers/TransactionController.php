<?php

namespace App\Http\Controllers;
use App\Http\Requests\TransactionCreateRequest;
use App\Http\Requests\TransactionUpdateRequest;
use Illuminate\Http\Request;
use App\Transaction;
use App\Project;
use App\Category;
use App\Activity;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{

    private $transaction;

    public function __construct()
    {
        $this->transaction = new TransactionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // dd($request->all());

      $where = [];
      $filters = [];

      if ($request->has('project') && !empty($request->get('project'))) {
          $where['projects.id'] = $request->get('project');
      }
      if ($request->has('category') && !empty($request->get('category'))) {
          $where['categories.id'] = $request->get('category');
      }
      if ($request->has('activity') && !empty($request->get('activity'))) {
          $where['activities.id'] = $request->get('activity');
      }
      if ($request->has('transaction') && !empty($request->get('transaction'))) {
          $where['transactions.id'] = $request->get('transaction');
      }

      //$transaction = $this->filteredRecords($where);

        //$transactions = Transaction::paginate(15);
        $transactions = $this->filteredRecords($where);
        $projects = Project::all();
        $categorys = Category::all();
        $activitys = Activity::all();
        $alltransactions = Transaction::all();
       // dd($transactions);
        return view('transaction.index', compact('transactions','projects','categorys','activitys','alltransactions'));
      //  return view('transaction.index', ['data' => $transaction, 'filters' => $filters, 'where' => $where]);
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


    public function submit(Request $request)
    {


    }

    public function filteredRecords($where = [], $groupBy = [])
    {
        return $this->transaction->getItems($where, $groupBy);
    }
}
