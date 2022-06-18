<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class OfferController extends Controller
{
    //SHOW ALL OFFERS
    public function showOffers()
    {
        $offers = Offer::all();
        return view('admin.offers.index', compact('offers'));
    }

    //STORE OFFER
    public function store()
    {
        request()->validate([
            'name'     => 'required',
            'type'     => 'required',
            'amount'   => 'required',
            'start'    => 'required',
            'end'      => 'required'
        ]);

        Offer::create([
            'offer_name'        => request('name'),
            'offer_type'        => request('type'),
            'offer_amount'      => request('amount'),
            'offer_start'       => request('start'),
            'offer_end'         => request('end'),
        ]);


        return redirect()->back()->with('create-message', 'New Offer Created');
    }

    //SHOW EDIT OFFER
    public function showEditOffer($id)
    {
        $offer = Offer::find($id);
        return view('admin.offers.edit', compact('offer'));
    }

    //SAVE EDIT OFFER
    public function submitEditOffer($id)
    {
        $offer = Offer::find($id);
        request()->validate([
        'name'     => 'required',
        'type'     => 'required',
        'amount'   => 'required',
        'start'    => 'required',
        'end'      => 'required'
        ]);

        $offer->update([
            'offer_name'        => request('name'),
            'offer_type'        => request('type'),
            'offer_amount'      => request('amount'),
            'offer_start'       => request('start'),
            'offer_end'         => request('end'),
        ]);
        return redirect()->route('show.offers')->with('update-message', 'Offer updated successfully');
    }

    //DELETE OFFER
    public function deleteOffer($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->back()->with('delete-message', 'Offer deleted');
    }

    //UPDATE OFFER STATUS
    public function updateOfferStatus($id, $status)
    {
        $offer = Offer::find($id);
        $offer->status = $status;
        $offer->update();
        return response()->json(['message' => 'success']);
    }

    //ADD OFFER PRODUCTS
    public function storeAddOfferProducts()
    {
        if(request()->has('product_checked') && request('promotional_offers') != null)
        {
            $offerId =  request('promotional_offers');
            $offer = Offer::find($offerId);
            $offerProducts = request('product_checked');
            foreach ( $offerProducts as $offerProduct)
            {
                $offer->products()->detach($offerProduct);
                $offer->products()->attach($offerProduct);
            }
            return redirect()->back();
        }
        else
        {
            return redirect()->back()->with('offer-message', 'Select both Product and Offer');
        }
    }

    //VIEW OFFER PRODUCTS
    public function viewOfferProducts($id)
    {
        $offer_products = Offer::findOrFail($id)->products;
        return view('admin.offers.view-products', compact('offer_products'));
    }

    //DELETE OFFER  PRODUCT
    public function deleteOfferProduct($id)
    {
        $product = Product::find($id);
        $product->offers()->detach();
        return redirect()->back()->with('delete-message', 'Product deleted');
    }


}
