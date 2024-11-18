<?php

namespace app\controllers;

use app\libraries\Controller;
use Exception;

class Pages extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): void
    {
        $services = $this->model('Service')->limit(6);
        $portfolios = $this->model('Portfolio')->limit(8);
        $plans = $this->model('Plan')->limit(3);
        $testimonials = $this->model('Testimonial')->limit(4);
        $members = $this->model('Member')->all();
        $articles = $this->model('Article')->limit(3);

        $this->view('pages/index',compact('services','portfolios','plans','testimonials','members','articles'));
    }

    /**
     * @throws Exception
     */
    public function blog(string $slug = null): void
    {
        if (is_null($slug)) {

            $articles = $this->model('Article')->all();
            $categories = $this->model('Category')->all();

            $this->view('pages/blog',compact('articles','categories'));

        } else {

            $article = $this->model('Article')->where('slug',$slug)->fetch();

            if (!$article) {

                redirect('/pages/blog');
            }

            if (request_is_post()) {

                $inputs = validation([
                    'name' => 'فیلد نام الزامی است.',
                    'email' => 'فیلد ایمیل الزامی است.',
                    'comment' => 'فیلد کامنت الزامی است.'
                ]);
    
                if (validate()) {
    
                    $this->model('Comment')->create([
                        'article_id' => $article->id,
                        'name' => $inputs['name'],
                        'email' => $inputs['email'],
                        'comment' => $inputs['comment']
                    ]);
        
                    redirect('/pages/blog/' . $article->slug);
                    
                }

            } else {

                $user = $this->model('User')->find($article->user_id);
                $category = $this->model('Category')->find($article->category_id);
                $comments = $this->model('Comment')->join(1);

                $this->view('pages/blog-single',compact('article', 'user', 'category', 'comments'));
            }
        }
    }

    /**
     * @throws Exception
     */
    public function services(): void
    {
        $services = $this->model('Service')->all();

        $this->view('pages/services',compact('services'));
    }

    /**
     * @throws Exception
     */
    public function portfolios(string $slug = null): void
    {
        if (is_null($slug)) {

           $portfolios = $this->model('Portfolio')->all();

           $this->view('pages/portfolios',compact('portfolios'));
        } else {

            $portfolio = $this->model('Portfolio')->where('slug',$slug)->fetch();

            $this->view('pages/portfolio-detail', compact('portfolio'));
        }
    }

    /**
     * @throws Exception
     */
    public function about(): void
    {
        $members = $this->model('Member')->all();

        $this->view('pages/about-us',compact('members'));
    }

    /**
     * @throws Exception
     */
    public function contact(): void
    {
        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'email' => 'فیلد ایمیل الزامی است.',
                'message' => 'فیلد پیام الزامی است.'
            ]);

            if (validate()) {

                $this->model('Message')->create([
                    'name' => $inputs['name'],
                    'email' => $inputs['email'],
                    'message' => $inputs['message']
                ]);
    
                redirect('/pages/contact');
                
            }
        }

        $this->view('pages/contact-us');
    }

    /**
     * @throws Exception
     */
    public function plans(): void
    {
        $plans = $this->model('Plan')->all();

        $this->view('pages/plans',compact('plans'));
    }
}