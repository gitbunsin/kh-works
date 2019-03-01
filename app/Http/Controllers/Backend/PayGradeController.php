<?php

namespace App\Http\Controllers\Backend;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Model\PayGrade;
use App\PayGradeCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class PayGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $pay_grade = PayGrade::where(['company_id' => Auth::guard('admins')->user()->id])->get();
        $data = [];
        foreach ($pay_grade as $item) {
            $result = $this->getCurrencyNameByPaygrade($item["id"]);
            $item["currency_name"] = $result;
            array_push($data, $item);
        }
        return view('backend.HRIS.admin.PayGrade.index', compact('data'));
    }

    public function getCurrencyNameByPaygrade($payGradeId)
    {

        $pay_grade = DB::table('tbl_pay_grade_currency as pc')
            ->select('ct.currency_name')
            ->leftJoin('tbl_currency_type as ct', 'pc.currency_id', "=", 'ct.currency_id')
            ->where('pc.pay_grade_id', $payGradeId)
            ->get()
            ->toArray();
        return $pay_grade;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.HRIS.admin.PayGrade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paygrade = Paygrade::create($request->all());
        $paygrade->companies()->associate(Auth::guard('admins')->user()->id);
        $paygrade->save();
        return redirect('/administration/pay-grade');
    }

    /**
     * Add Currency to PayGrade
     *
     * @param Request $request
     * @return void
     */
    public function AddPayGradeCurrency(Request $request)
    {

        $currency = \App\Model\Backend\Currency::findOrFail($request->currency_id);
        $paygrade = Paygrade::findOrFail($request->pay_grade_id);
        $arrPovit = [
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary
        ];
        $paygrade->currencies()->attach($currency, $arrPovit);

        //reterive paygrade back
        $p = Paygrade::findOrFail($paygrade->id);
        $data = $p->currencies()->wherePivot('currency_id', $currency->id)->first();

        return response()->json($data);
    }

    function destroyPaygradeCurrency(Request $request) {
        $currency_id = $request->currency_id;
        $paygrade_id = $request->paygrade_id;
        $currency = \App\Model\Backend\Currency::findOrFail($currency_id);
        $currency->paygrades()->detach([$paygrade_id]);

        return response()->json($currency);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function show($currency_id)
    {
        $data['selected_currency'] = PayGradeCurrency::findOrFail($currency_id);
        $data['all_currency'] = Currency::all();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay_grade = Paygrade::with('currencies')->where('id', $id)->first();
        // return response()->json($pay_grade);
        return view('backend.HRIS.admin.PayGrade.edit', compact('pay_grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $currency_id)
    {
        $grade = PayGrade::findOrFail($currency_id);
        $grade->update($request->all());

        return redirect('/administration/pay-grade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay_grade = PayGradeCurrency::destroy($id);
        return response()->json($pay_grade);
    }

    public function getRelationPayGradeCurrency($id) {
        $payGrade = Paygrade::with('currencies')->get();

        return response()->json($payGrade);
    }
}
