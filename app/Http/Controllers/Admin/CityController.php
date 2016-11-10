<?php
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\BaseTypeController;
use Illuminate\Database\QueryException;

class CityController extends BaseTypeController
{
    protected $modelClass = 'App\Models\City';

    protected $baseUrl = '/admin/city';

    protected $overviewView = 'admin/city/index';

    public function destroy($id)
    {
        try {
            return parent::destroy($id);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                request()->session()->flash('custom_error', [
                    'message' => trans('admin/city.constraint_error'),
                    'type' => 'danger'
                ]);
                return redirect('/admin/city');
            }
        }
    }
}