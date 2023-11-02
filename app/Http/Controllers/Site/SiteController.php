<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\UpdateMainContentRequest;
use App\Http\Requests\Site\UpdateSiteLogoRequest;
use App\Models\Blog\Blog;
use App\Models\Site\Carousel;
use App\Models\Site\ExternalLinks;
use App\Models\Site\Footer;
use App\Models\Site\MainContent;
use App\Models\Site\MidiasSociais;
use App\Models\Site\SiteHead;
use Illuminate\Support\Facades\File;

/**
 * Controller Site
 */
class SiteController extends Controller
{
    public function index()
    {
        /** Carregar Logotipo*/
        $logotipo = new SiteHead;
        $logo = $logotipo->first()->logotipo ?? '';

        /** Título e descricao da pagina*/
        $content = MainContent::first();

        /** Links Externos*/
        $links = ExternalLinks::all()->toArray();

        /** Carousel de imagens*/
        $carousels = Carousel::all();

        /** Dados do Rodape */
        $footer = Footer::first();

        /** Redes Sociais */
        $redesSociais = MidiasSociais::all();

        /** Blog */
        $blogs = Blog::all();

        $fotos = [];
        foreach ($blogs as $blog) {
            $fotos[] = $blog->imagem;
        }

        return view('welcome', compact('logo', 'content', 'links', 'carousels', 'footer', 'redesSociais', 'blogs'));
    }

    /**
     * Visualizar Logotipo
     *
     * @return void
     */
    public function logo()
    {
        $logotipo = SiteHead::all();
        return view('Site.Header.Logo.index', compact('logotipo'));
    }

    /**
     * Atualizar Logotipo
     *
     * @param UpdateSiteLogoRequest $request
     * @return void
     */
    public function updateLogo(UpdateSiteLogoRequest $request)
    {
        $logotipo = new SiteHead;
        $logo = $logotipo->first();

        if (empty($logo)) {

            if ($request->logotipo->isValid()) {

                $nameFile = "logo" . "." . $request->logotipo->getClientOriginalExtension();
                $request->logotipo->move(public_path('images\site\logotype\\'), $nameFile);

                $logotipo = new SiteHead;
                $logotipo->logotipo = $nameFile;
                $logotipo->save();

                return redirect()->route('dashboard')
                    ->with('message', 'Logotipo alterado com sucesso');
            }
        }

        if (!empty($logo)) {

            if (File::exists(public_path('/images/site/logotype/' . $logo->logotipo))) {
                File::delete(public_path('/images/site/logotype/' . $logo->logotipo));
                $logotipo->truncate();
            }

            if ($request->logotipo->isValid()) {

                $nameFile = "logo" . "." . $request->logotipo->getClientOriginalExtension();
                $request->logotipo->move(public_path('images\site\logotype\\'), $nameFile);

                $logotipo = new SiteHead;
                $logotipo->logotipo = $nameFile;
                $logotipo->save();

                return redirect()->route('dashboard')
                    ->with('message', 'Logotipo alterado com sucesso');
            }
        }
    }

    public function mainContent()
    {
        $mainContent = MainContent::first();
        return view('Site.Content.index', compact('mainContent'));
    }

    public function updateMainContent(UpdateMainContentRequest $request)
    {
        $data = $request->all();

        $result = new MainContent;
        $mainContent = $result->first();

        if (empty($mainContent)) {

            $createMainContent = MainContent::create($data);

            if ($createMainContent) {
                return redirect()->route('dashboard')
                    ->with('message', 'Conteúdo alterado com sucesso');
            } else {
                return redirect()->route('dashboard')
                    ->withErrors('message', 'Erro ao atualizar');
            }
        } else {

            if ($mainContent->update($data)) {
                return redirect()->route('dashboard')
                    ->with('message', 'Conteúdo alterado com sucesso');
            } else {
                return redirect()->route('dashboard')
                    ->withErrors('message', 'Erro ao atualizar');
            }
        }
    }
}
