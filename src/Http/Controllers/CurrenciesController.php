<?php

namespace Tjventurini\VoyagerShop\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CurrenciesController extends VoyagerBaseController
{
    /**
     * General validation.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function validation(Request $request)
    {
        $request->validate($this->rules());
    }

    /**
     * Create the validation rules to apply.
     * @return array The validation rules to apply.
     */
    private function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'code' => 'required|regex:/^[A-Z]{3}$/',
            'sign' => 'required|min:1|max:1',

            'currency_belongsto_project_relationship' => 'required|exists:projects,id',
            'currency_belongsto_country_relationship' => 'required|exists:countries,id',
        ];
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validation($request);
        return parent::store($request);
    }

    /**
     * POST BR(E)AD - Update data.
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validation($request);
        return parent::update($request, $id);
    }
}
