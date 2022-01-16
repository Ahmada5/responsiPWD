<?php

namespace App\Controllers;

use App\Models\KomikModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Komik extends BaseController
{
    protected $komikModel, $req;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
        $this->req = \Config\Services::request();
    }
    public function index()
    {
        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Manga Desu | Komik',
            'judul' => '',
            'penulis' => '',
            'komik' => $this->komikModel->getKomik(),
        ];

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'komik' => $komik,
        ];

        return view('/komik/detail', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Komik',
            'validation' => \Config\Services::validation(),

        ];

        return view('/komik/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'judul' => 'required|is_unique[komik.judul]'
        ])) {
            $validation = \Config\Services::validation();
            dd($validation);
            return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->req->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->req->getVar('judul'),
            'slug' => $slug,
            'genre' => $this->req->getVar('genre'),
            'penulis' => $this->req->getVar('penulis'),
            'sampul' => $this->req->getVar('sampul'),
        ]);


        return redirect()->to('/komik');
    }

    public function services()
    {
        $data = [
            'title' => 'Services | Data Komik'

        ];

        return view('/Services/index', $data);
    }
    public function dataJSON()
    {
        helper('xml');
        $data = [
            'title' => 'JSON | Data Komik',
            'data' => $this->komikModel->getData()

        ];

        return view('/API/dataJSON', $data);
    }
    public function dataXML()
    {
        helper('xml');
        $data = [
            'title' => 'XML | Data Komik',
            'data' => $this->komikModel->getData()

        ];

        return view('/API/dataXML', $data);
    }

    public function delete($id)
    {
        $this->komikModel->where(['id' => $id])->delete($id);
        return redirect()->to('/komik');
    }
    public function cetak()
    {
        $data = $this->komikModel->getData();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'SAMPUL')
            ->setCellValue('B1', 'JUDUL')
            ->setCellValue('C1', 'GENRE');

        $column = 2;
        // tulis data mobil ke cell
        foreach ($data as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['sampul'])
                ->setCellValue('B' . $column, $data['judul'])
                ->setCellValue('C' . $column, $data['genre']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Siswa';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function search()
    {
        $judul = $this->request->getVar('judul');
        $search = $this->komikModel->where(['judul' => $judul])->get()->getResultArray();

        $data = [
            'komik' => $search,
            'title' => 'Manga Desu | Komik',
        ];
        return view('komik/index', $data);
    }
}
