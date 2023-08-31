<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountEmployeeSalary;

class AccountSalaryController extends Controller
{
    // AccountSalaryController
    public function EmployeeSalaryView(){
        $data['allData'] = AccountEmployeeSalary::all();
        return view('backend.account.account_salary.employee_salary_view', $data);
    }




}
