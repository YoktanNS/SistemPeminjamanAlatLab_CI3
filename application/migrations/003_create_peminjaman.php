<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_peminjaman extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id_peminjaman' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'id_alat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'tanggal_pinjam' => [
                'type' => 'DATE',
                'null' => FALSE
            ],
            'tanggal_kembali_expected' => [
                'type' => 'DATE',
                'null' => FALSE
            ],
            'tanggal_kembali_actual' => [
                'type' => 'DATE',
                'null' => TRUE
            ],
            'denda' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],
            'biaya_perbaikan' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],
            'total_biaya' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ]
        ]);

        $this->dbforge->add_key('id_peminjaman', TRUE);
        $this->dbforge->create_table('peminjaman');

        // Tambahkan relasi manual
        $this->db->query('ALTER TABLE peminjaman ADD CONSTRAINT fk_mahasiswa FOREIGN KEY (id_mahasiswa) REFERENCES mahasiswa(id_mahasiswa) ON DELETE CASCADE');
        $this->db->query('ALTER TABLE peminjaman ADD CONSTRAINT fk_alat FOREIGN KEY (id_alat) REFERENCES alat(id_alat) ON DELETE CASCADE');
    }

    public function down()
    {
        $this->dbforge->drop_table('peminjaman');
    }
}
