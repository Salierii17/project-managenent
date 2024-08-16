package com.example.demo.model;

import java.security.Timestamp;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class lokasi {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;
    private String nama_lokasi;
    private String negara;
    private String provinsi;
    private String kota;
    private Timestamp create_at;


    // Getters and Setters
    public Integer getId() {
        return id;
    }
    public void setId(Integer id) {
        this.id = id;
    }
    public String getNama_lokasi() {
        return nama_lokasi;
    }
    public void setNama_lokasi(String nama_lokasi) {
        this.nama_lokasi = nama_lokasi;
    }
    public String getNegara() {
        return negara;
    }
    public void setNegara(String negara) {
        this.negara = negara;
    }
    public String getProvinsi() {
        return provinsi;
    }
    public void setProvinsi(String provinsi) {
        this.provinsi = provinsi;
    }
    public String getKota() {
        return kota;
    }
    public void setKota(String kota) {
        this.kota = kota;
    }
    public Timestamp getCreate_at() {
        return create_at;
    }
    public void setCreate_at(Timestamp create_at) {
        this.create_at = create_at;
    }


}
