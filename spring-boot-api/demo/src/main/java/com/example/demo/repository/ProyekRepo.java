package com.example.demo.repository;

import java.time.LocalDateTime;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.example.demo.model.Proyek;

import jakarta.websocket.Decoder.Text;

public interface ProyekRepo extends JpaRepository<Proyek, Integer> {

        @Query("SELECT p FROM Proyek p WHERE p.id = :id")
        Optional<Proyek> findProyekById(@Param("id") Integer id);

        @Query("UPDATE Proyek p SET p.nama_proyek = :namaProyek, p.client = :client, p.tgl_mulai = :tglMulai, p.tgl_selesai = :tglSelesai, p.pimpinan_proyek = :pimpinanProyek, p.keterangan = :keterangan WHERE p.id = :id")
        @Modifying
        void updateProyek(
                        @Param("id") Integer id,
                        @Param("namaProyek") String namaProyek,
                        @Param("client") String client,
                        @Param("tglMulai") LocalDateTime localDateTime,
                        @Param("tglSelesai") LocalDateTime localDateTime2,
                        @Param("pimpinanProyek") String pimpinanProyek,
                        @Param("keterangan") Text text);

        @Query(value = "INSERT INTO Proyek (nama_proyek, client, tgl_mulai, tgl_selesai, pimpinan_proyek, keterangan) VALUES (:namaProyek, :client, :tglMulai, :tglSelesai, :pimpinanProyek, :keterangan)", nativeQuery = true)
        @Modifying
        void insertProyek(
                        @Param("namaProyek") String namaProyek,
                        @Param("client") String client,
                        @Param("tglMulai") LocalDateTime localDateTime,
                        @Param("tglSelesai") LocalDateTime localDateTime2,
                        @Param("pimpinanProyek") String pimpinanProyek,
                        @Param("keterangan") Text text);

        @Modifying
        @Query("DELETE FROM Proyek p WHERE p.id = :id")
        void deleteProyekById(@Param("id") Integer id);
}
