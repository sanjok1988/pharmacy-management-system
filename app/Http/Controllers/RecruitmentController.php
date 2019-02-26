<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Company\Models\Company;
use App\Modules\Vacancy\Models\Vacancy;

class RecruitmentController extends Controller
{
    protected $vacancy;

    protected $company;

    public function __construct(Vacancy $vacancy, Company $company)
    {
        $this->vacancy = $vacancy;
        $this->company = $company;
    }

    public function getData()
    {
        $company = $this->company->get();
       

        return view('hibiku.recruitment_information', compact('company'));
    }
    public function findVacancy($id)
    {
        $vacancy = $this->vacancy->find($id);

      
        return view('hibiku.recruitment_informationdetails', compact('vacancy'));
    }
}
