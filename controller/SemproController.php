<?php
include_once 'function/main.php';
include_once 'config/static.php';
include_once 'models/Sempro.php';
include_once 'models/Dosen.php';

class SemproController {
    static function indexJadwal() {
        view('Sempro/layout', ['url' => 'viewSempro', 'title' => 'Jadwal Sempro', 'sempro' => Sempro::getSempro(), 'dosen' => Dosen::getDosen()]);
    }
    
    static function store() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $sempro = Sempro::addSempro([
                'nama' => $post['nama'],
                'nim' => $post['nim'],
                'judul' => $post['judul'],
                'tanggal' => $post['tanggal'],
                'pembahas1_id' => $post['pembahas1_id'],
                'pembahas2_id' => $post['pembahas2_id'],
                'pembimbing1_id' => $post['pembimbing1_id'],
                'pembimbing2_id' => $post['pembimbing2_id'],
            ]);

            if ($sempro) {
                header('Location: ' . BASEURL . 'jadwalsempro');
            } else {
                echo ('Error');
            }
        }
    }

    static function update() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $sempro = Sempro::updateSempro([
                'id' => $post['id'],
                'nama' => $post['nama'],
                'nim' => $post['nim'],
                'judul' => $post['judul'],
                'tanggal' => $post['tanggal'],
                'pembahas1_id' => $post['pembahas1_id'],
                'pembahas2_id' => $post['pembahas2_id'],
                'pembimbing1_id' => $post['pembimbing1_id'],
                'pembimbing2_id' => $post['pembimbing2_id'],
            ]);

            if ($sempro) {
                header('Location: ' . BASEURL . 'jadwalsempro');
            } else {
                header('Location: ' . BASEURL . 'jadwalsempro');
            }
        }
    }

    static function storeLink() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $sempro = Sempro::addLink([
                'id' => $post['id'],
                'link_proposal' => $post['link_proposal'],
                'link_zoom' => $post['link_zoom'],
                'link_record' => $post['link_record'],
            ]);

            if ($sempro) {
                header('Location: ' . BASEURL . 'jadwalsempro');
            } else {
                header('Location: ' . BASEURL . 'jadwalsempro');
            }
        }
    }

    static function delete() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login');
            exit;
        }
        else {
            $sempro = Sempro::delete($_GET['id']);
            if ($sempro) {
                header('Location: ' . BASEURL . 'jadwalsempro');
            } else {
                echo ('Error');
            }
        }
    }
    }