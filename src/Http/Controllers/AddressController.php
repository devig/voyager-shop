<?php

namespace Tjventurini\VoyagerShop\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class AddressController extends VoyagerBaseController
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
            'name' => 'required|string|min:3',
            'street' => 'required|string|min:5',
            'zip' => 'required|string|min:4',
            'address_belongsto_project_relationship' => 'required|exists:projects,id',
            'address_belongsto_country_relationship' => 'required|exists:countries,id',
            'address_belongsto_user_relationship' => 'required|exists:users,id',
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
