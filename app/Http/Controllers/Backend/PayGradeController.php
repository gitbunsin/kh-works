<?php

namespace  App\Http\Controllers\Backend;
use App\Currency;
use App\Http\Controllers\Controller;
use App\PayGrade;
use App\PayGradeCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PayGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay_grade = PayGrade::all()->toArray();
        $data = [];
       // $pay_grade["arr_currency_name"] = [];
       // dd($pay_grade);
        foreach ($pay_grade as $item) {
           //dd($item["id"]);
            $result = $this->getCurrencyNameByPaygrade($item["id"]);
          //  dd($result);
            $item["currency_name"] = $result;
           //dd($item["currency_name"]);
//            dd($result);
            array_push($data, $item);
           // dd(array_push($data, $item));
        }
        //dd($data);

      //  dd($pay_grade);
        return view('backend.HRIS.admin.PayGrade.index',compact('data'));
    }

    public function getCurrencyNameByPaygrade($payGradeId) {

        $pay_grade = DB::table('tbl_pay_grade_currency as pc')
            ->select('ct.currency_name')
            ->leftJoin('tbl_currency_type as ct','pc.currency_id',"=",'ct.currency_id')
            ->where('pc.pay_grade_id',$payGradeId)
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
        //
//        dd('hello');
        $grade = new PayGrade();
        $grade->name = input::get('name');
        $grade->created_by = input::get('user_id');
        $grade->fd = \Carbon\Carbon::now();
        $grade->td = \Carbon\Carbon::now();
        $grade->save();
        return redirect('/administration/pay-grade');
    }
    public function AddPayGradeCurrency(Request $request)
    {

         $CurrencyPayGrade = new PayGradeCurrency();
         $CurrencyPayGrade->currency_id = $request->currency_id;
         $CurrencyPayGrade->pay_grade_id = $request->pay_grade_id;
         $CurrencyPayGrade->min_salary = $request->min_salary;
         $CurrencyPayGrade->max_salary = $request->max_salary;
         $CurrencyPayGrade->save();

        return response()->json($CurrencyPayGrade);
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
        $pay_grade = PayGrade::where('id',$id)->first();
//        dd($pay_grade);
        $pay_grade_currency = DB::table('tbl_pay_grade_currency as pc')
            ->select('pc.*','ct.*')
            //->join('tbl_pay_grade_currency as pc','p.id',"=",'pc.pay_grade_id')
            ->join('tbl_currency_type as ct','pc.currency_id',"=",'ct.currency_id')
            ->where('pc.pay_grade_id',$id)->get();
//       dd($pay_grade_currency);
        return view('backend.HRIS.admin.PayGrade.edit',compact('pay_grade_currency','pay_grade'));
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
       $PayGradeCurrency = PayGradeCurrency::findOrFail($currency_id);
       $PayGradeCurrency->pay_grade_id = $request->pay_grade_id;
       $PayGradeCurrency->currency_id = $request->currency_id;
       $PayGradeCurrency->min_salary = $request->min_salary;
       $PayGradeCurrency->max_salary = $request->max_salary;
       $PayGradeCurrency->save();
       return response()->json($PayGradeCurrency);
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
}
