<?php
namespace App\Traits;

use Illuminate\Support\Facades\Request;

class ActiveMenu
{
    public $edit_search_item;

    public function isEditSearchItemActive()
    {
        if (
        //technical internship student
        $this->isJobCategoryActive() ||

        $this->isIncomeActive() ||

        $this->isBurdenCostActive() ||

        //international student
        $this->isBurdenCostActive() ||

        $this->isUniversityActive()
        ) {
            return true;
        }
        return false;
    }

    public function isAdsActive()
    {
        if (
            Request::is('admin/ads')  ||
            Request::is('admin/ads/create') ||
            Request::is('admin/ads/mbr/create') ||
         
            Request::is('admin/draft')  ||
            Request::is('admin/draft/edit/*') ||

            Request::is('admin/translation') ||
            Request::is('admin/translation/edit/*')
            ) {
            return true;
        }
        return false;
    }

    /**
     * Advertisement List
     *
     * @return boolean
     */
    public function isAdListActive()
    {
        if (
            
            Request::is('admin/advertisement/list')  ||
            Request::is('admin/ads')  ||
            Request::is('admin/ads/create') ||
         
            $this->isDraftActive() ||

            $this->isTranslationActive()
            ) {
            return true;
        }
        return false;
    }

    public function isMembersActive()
    {
        if (
            Request::is('admin/members')  ||
            Request::is('admin/members/create') ||
            Request::is('admin/members/show') ||
            Request::is('admin/members/edit/*')
            ) {
            return true;
        }
        return false;
    }


    /**
     * Union members List
     *
     * @return boolean
     */
    public function isUnionMemberActive()
    {
        if (
            Request::is('admin/unionmember') ||
            Request::is('admin/unionmember/create') ||
            Request::is('admin/unionmember/edit/*') ||
            Request::is('admin/unionmemberdetail/*') ||

            Request::is('admin/ads/mbr') ||
            Request::is('admin/ads/mbr/create') ||

            Request::is('admin') ||

            $this->isDraftActive() ||
            $this->isTranslationActive()
            
            ) {
            return true;
        }
        return false;
    }

    public function isDraftActive()
    {
        if (
            Request::is('admin/draft')  ||
            Request::is('admin/draft/edit/*')
            ) {
            return true;
        }
        return false;
    }

    public function isTranslationActive()
    {
        if (
            Request::is('admin/translation') ||
            Request::is('admin/translation/edit/*')
            ) {
            return true;
        }
        return false;
    }


    public function isIncomeActive()
    {
        if (
            Request::is('admin/income')  ||
            Request::is('admin/income/edit/*') ||
            Request::is('admin/income/create')
            ) {
            return true;
        }
        return false;
    }

    public function isJobCategoryActive()
    {
        if (
            Request::is('admin/job/category') ||
            Request::is('admin/job/category/create') ||
            Request::is('admin/job/category/edit/*')
            ) {
            return true;
        }
        return false;
    }

    public function isStdBurdenCostActive()
    {
        if (
            Request::is('admin/burdencost/std') ||
            Request::is('admin/burdencost/std/create') ||
            Request::is('admin/burdencost/std/edit/*')
            ) {
            return true;
        }
        return false;
    }

    public function isBurdenCostActive()
    {
        if (
            Request::is('admin/burdencost') ||
            Request::is('admin/burdencost/create') ||
            Request::is('admin/burdencost/edit/*')
            ) {
            return true;
        }
        return false;
    }

    public function isUniversityActive()
    {
        if (
            Request::is('admin/university') ||
            Request::is('admin/university/create') ||
            Request::is('admin/university/edit/*')
            ) {
            return true;
        }
        return false;
    }

    public function isUserActive()
    {
        if (
            Request::is('admin/users') ||
            Request::is('admin/users/*') ||
            Request::is('admin/role/change/*')) {
            return true;
        }
        return false;
    }

    public function isAccountManagementActive()
    {
        if (
            Request::is('admin/adplacementrequest-list')
            ) {
            return true;
        }
        return false;
    }
}
