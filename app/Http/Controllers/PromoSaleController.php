<?php

namespace App\Http\Controllers;

use App\Models\PromoSale;
use App\Http\Requests\StorePromoSaleRequest;
use App\Http\Requests\UpdatePromoSaleRequest;

class PromoSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePromoSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromoSaleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PromoSale  $promoSale
     * @return \Illuminate\Http\Response
     */
    public function show(PromoSale $promoSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromoSaleRequest  $request
     * @param  \App\Models\PromoSale  $promoSale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromoSaleRequest $request, PromoSale $promoSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromoSale  $promoSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromoSale $promoSale)
    {
        //
    }
}
