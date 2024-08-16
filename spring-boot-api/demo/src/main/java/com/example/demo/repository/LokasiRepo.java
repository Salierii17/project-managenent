package com.example.demo.repository;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.example.demo.model.Lokasi;

public interface LokasiRepo extends JpaRepository<Lokasi, Integer> {

    @Query("SELECT l FROM Lokasi l WHERE l.id = :id")
    Optional<Lokasi> findLokasiById(@Param("id") Integer id);

    @Query("UPDATE Lokasi l SET l.nama_lokasi = :nama, l.negara = :negara, l.provinsi = :provinsi, l.kota = :kota WHERE l.id = :id")
    @Modifying
    void updateLokasi(
            @Param("id") Integer id,
            @Param("nama") String namaLokasi,
            @Param("negara") String negara,
            @Param("provinsi") String provinsi,
            @Param("kota") String kota);

    @Query("INSERT INTO Lokasi (nama_lokasi, negara, provinsi, kota) VALUES (:nama, :negara, :provinsi, :kota)")
    @Modifying
    void insertLokasi(
            @Param("nama") String namaLokasi,
            @Param("negara") String negara,
            @Param("provinsi") String provinsi,
            @Param("kota") String kota);

    @Modifying
    @Query("DELETE FROM Lokasi l WHERE l.id = :id")
    void deleteLokasiById(@Param("id") Integer id);
}
