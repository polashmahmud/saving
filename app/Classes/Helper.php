<?php


namespace App\Classes;


use App\Collection;
use Carbon\Carbon;

class Helper
{
    public static function delete_form($form_url, $id, $token)
    {
        $form = "<form id=\"delete-form-$id\" method=\"post\" action=\"$form_url\" style=\"display: none\">
                    <input type=\"hidden\" name=\"_token\" value=\"$token\">
                    <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                  </form>
                  <span><a class='btn btn-default btn-xs' href=\"\" onclick=\"
                  if(confirm('Are you sure, You Want to delete this?'))
                      {
                        event.preventDefault();
                        document.getElementById('delete-form-$id').submit();
                      }
                      else{
                        event.preventDefault();
                      }\" ><i class=\"fa fa-trash font-14\"></i></a>";

        return $form;
    }

    public static function accountType($type)
    {
        switch ($type) {
            case 0:
                return '<span class="badge badge-danger m-r-5 m-b-5">Lone Package</span>';
                break;
            case 1:
                return '<span class="badge badge-default m-r-5 m-b-5">Saving Package</span>';
                break;
            case 2:
                return '<span class="badge badge-primary m-r-5 m-b-5">Double Package</span>';
                break;
        }
    }

    public static function accountUserImage($puth)
    {
        if ($puth == null)
            return '<img src="/img/blank-profile.jpg" style="width:45px;">';
        return "<img src=\"$puth\" style=\"width:45px;\">";
    }

    public static function packageType($type)
    {
        switch ($type) {
            case 0:
                return 'Lone Package';
                break;
            case 1:
                return 'Saving Package';
                break;
            case 2:
                return 'Double Package';
                break;
        }
    }

    public static function collectAmountOnlyDouble($id)
    {
        $collection = Collection::with('account:amount')->where('account_id', $id)->get()->last();
        $last_date = $collection->date;
        $next_day = date('d', strtotime("+1 day", strtotime($last_date)));

        return $next_day;
    }

    public static function collectionLastDate($id)
    {
        $collection = Collection::with('account:amount')->where('account_id', $id)->get()->last();
        $last_date = $collection->date;

        return $last_date;
    }
}