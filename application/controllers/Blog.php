<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Home');
        $this->load->model('M_Artikel'); // Model untuk artikel eksternal
    }

    public function index()
    {
        // Data umum
        $data['user']    = $this->M_User->get_user_logo();
        $data['title']   = 'Artikel - Desa Wisata Sedari';
        $data['kontak']  = $this->M_Home->getKontak();

        // Ambil data artikel eksternal dari database
        $data['artikel_eksternal'] = $this->M_Artikel->getArtikelEksternal();

        // Ambil data artikel internal dari file JSON
        $articles_json = file_get_contents(FCPATH . 'assets/data/articles.json');
        $all_articles  = json_decode($articles_json, true);

        // Pagination setup
        $page     = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $per_page = 6;
        $offset   = ($page - 1) * $per_page;

        // Filter by category
        $category = $this->input->get('category');
        if ($category && $category !== 'all') {
            $all_articles = array_filter($all_articles, function($article) use ($category) {
                return strtolower($article['category']) === strtolower($category);
            });
        }

        // Sort by date (newest first)
        usort($all_articles, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        // Data artikel untuk halaman sekarang
        $articles       = array_slice($all_articles, $offset, $per_page);
        $total_articles = count($all_articles);
        $total_pages    = ceil($total_articles / $per_page);

        // Ambil kategori unik
        $categories = array_unique(array_column($all_articles, 'category'));

        // Kirim ke view
        $data['articles']         = $articles;
        $data['current_page']     = $page;
        $data['total_pages']      = $total_pages;
        $data['categories']       = $categories;
        $data['current_category'] = $category;
        $data['total_articles']   = $total_articles;

        // Tampilkan view
        $this->load->view('fe/blog', $data);
    }

    public function search()
{
    $data['user']   = $this->M_User->get_user_logo();
    $data['kontak'] = $this->M_Home->getKontak();
    
    $query = $this->input->get('q');
    $data['search_query'] = $query;

    if (!$query) {
        redirect('blog');
    }

    // Ambil hasil pencarian hanya dari database tabel artikel eksternal (kolom judul)
    $data['artikel_eksternal'] = $this->M_Artikel->searchByTitle($query);

    $data['title'] = 'Pencarian: ' . $query . ' - Desa Wisata Sedari';
    
    // View yang sama seperti index agar tetap tampil rapi
    $this->load->view('fe/blog', $data);
}

}
