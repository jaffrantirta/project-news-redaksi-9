function confirmDelete(itemId, name) {
    var baseUrl = "http://www.redaksi9.com/";
    var method = null;

    if (name === 'artikel') {
        method = "manage_artikel/deleteArtikel/";
    }
    else if (name === 'berita') {
        method = "manage_berita/deleteBerita/";
    }
    else if (name === 'agenda') {
        method = "manage_agenda/deleteAgenda/";
    }
    else if (name === 'sudikerta') {
        method = "manage_sudikerta/deleteSudikerta/";
    }
    else if (name === 'pengumuman') {
        method = "manage_pengumuman/deletePengumuman/";
    }
    else if (name === 'kritik') {
        method = "manage_kritik/deleteKritik/";
    }
    else if (name === 'kategori') {
        method = "manage_kategori/deleteKategori/";
    }
    else if (name === 'wartawan') {
        method = "manage_wartawan/deleteWartawan/";
    }
    else if (name === 'tv') {
        method = "manage_tv/deleteTv/";
    }
    else if (name === 'pendaftaran') {
        method = "manage_pendaftaran/deletePendaftaran/";
    }
    else if (name === 'slider') {
        method = "manage_slider/deleteSlider/";
    }
    else if (name === 'banner') {
        method = "manage_banner/deleteBanner/";
    }
    else if (name === 'popup') {
        method = "manage_popup/deletePopup/";
    }
    else if (name === 'polling') {
        method = "manage_polling/deletePolling/";
    }
    else if (name === 'situs') {
        method = "manage_situs/deleteSitus/";
    }
    else if (name === 'running') {
        method = "manage_running/deleteRunning/";
    }
    else if (name === 'media') {
        method = "manage_media/deleteMedia/";
    }
    else if (name === 'kontak') {
        method = "manage_kontak/deleteKontak/";
    }
    else if (name === 'menumanager') {
        method = "manage_menumanager/deletemenumanager/";
    }
    else if (name === 'account') {
        method = "manage_account/deleteaccount/";
    }
    else if (name === 'about') {
        method = "manage_about/deleteAbout/";
    }

    alertify.confirm("Apakah anda yakin ingin menghapus data ini?", function (e) {
        if (e) {
            if(name !== null)
            window.location.href = baseUrl + method + itemId;
        }
    }).setHeader('Notification');
}