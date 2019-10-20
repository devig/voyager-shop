<?php

namespace Tjventurini\VoyagerShop\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class OrdersController extends VoyagerBaseController
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
            'state' => 'required|in:cart,pending,billed,canceled,declined,refunded',
            'order_belongsto_project_relationship' => 'required|exists:projects,id',
            'order_belongsto_user_relationship' => 'required|exists:users,id',
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
