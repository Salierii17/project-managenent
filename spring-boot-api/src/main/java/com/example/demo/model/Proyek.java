package com.example.demo.model;

import java.sql.Timestamp;
import java.time.LocalDate;
import java.time.LocalDate;
import java.util.List;

import org.hibernate.annotations.CreationTimestamp;

import com.fasterxml.jackson.annotation.JsonFormat;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinTable;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToMany;

@Entity
public class Proyek {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer Id;

   private String nama_proyek;
    private String client;

    @JsonFormat(pattern="dd MMMM yyyy")
    private LocalDate tgl_mulai;

    @JsonFormat(pattern="dd MMMM yyyy")
    private LocalDate tgl_selesai;

    private String pimpinan_proyek;
    private String keterangan;

    @CreationTimestamp
    @Column(updatable = false)
    @JsonFormat(shape = JsonFormat.Shape.STRING, pattern = "dd MMMM yyyy HH:mm:s")
    private Timestamp create_at;

    @ManyToMany
    @JoinTable(name = "proyek_lokasi", joinColumns = @JoinColumn(name = "proyek_id"), inverseJoinColumns = @JoinColumn(name = "lokasi_id"))
    private List<Lokasi> lokasi;

    // Constructor
    public Proyek() {

    }

    public Proyek(String nama_proyek, String client, LocalDate tgl_mulai, LocalDate tgl_selesai,
            String pimpinan_proyek, String keterangan) {
        this.nama_proyek = nama_proyek;
        this.client = client;
        this.tgl_mulai = tgl_mulai;
        this.tgl_selesai = tgl_selesai;
        this.pimpinan_proyek = pimpinan_proyek;
        this.keterangan = keterangan;
    }

    // Getters and Setters
    public Integer getId() {
        return Id;
    }

    public void setId(Integer id) {
        Id = id;
    }

    public String getNama_proyek() {
        return nama_proyek;
    }

    public void setNama_proyek(String nama_proyek) {
        this.nama_proyek = nama_proyek;
    }

    public String getClient() {
        return client;
    }

    public void setClient(String client) {
        this.client = client;
    }

    public LocalDate getTgl_mulai() {
        return tgl_mulai;
    }

    public void setTgl_mulai(LocalDate tgl_mulai) {
        this.tgl_mulai = tgl_mulai;
    }

    public LocalDate getTgl_selesai() {
        return tgl_selesai;
    }

    public void setTgl_selesai(LocalDate tgl_selesai) {
        this.tgl_selesai = tgl_selesai;
    }

    public String getPimpinan_proyek() {
        return pimpinan_proyek;
    }

    public void setPimpinan_proyek(String pimpinan_proyek) {
        this.pimpinan_proyek = pimpinan_proyek;
    }

    public String getKeterangan() {
        return keterangan;
    }

    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
    }

    public Timestamp getCreate_at() {
        return create_at;
    }

    public void setCreate_at(Timestamp create_at) {
        this.create_at = create_at;
    }
}
