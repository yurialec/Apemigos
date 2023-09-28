<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\UpdateSiteLogoRequest;
use App\Models\Site\SiteHead;
use Illuminate\Support\Facades\File;

/**
 * Controller Site
 */
class SiteController extends Controller
{
    public function index()
    {
        $logotipo = new SiteHead;
        $logo = $logotipo->first()->logotipo;

        return view('welcome', compact('logo'));
    }

    /**
     * Visualizar Imagem
     *
     * @return void
     */
    public function logo()
    {
        $logotipo = SiteHead::all();
        return view('Site.Header.Logo.index', compact('logotipo'));
    }

    public function updateLogo(UpdateSiteLogoRequest $request)
    {
        $logotipo = new SiteHead;
        $logo = $logotipo->first()->logotipo;

        if (File::exists(public_path('/images/site/logotype/' . $logo))) {
            File::delete(public_path('/images/site/logotype/' . $logo));
        }

        if ((!empty($logo))) {
            $logotipo->where('id', 1)->truncate();
        }

        if ($request->logotipo->isValid()) {

            $nameFile = "logo" . "." . $request->logotipo->getClientOriginalExtension();
            $request->logotipo->move(public_path('images\site\logotype\\'), $nameFile);

            $logotipo = new SiteHead;
            $logotipo->logotipo = $nameFile;
            $logotipo->save();

            return redirect()->route('dashboard');
        }
    }
}
