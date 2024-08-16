package com.example.demo.model;

import java.sql.Timestamp;
import java.time.LocalDateTime;

import org.hibernate.annotations.ManyToAny;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.JoinTable;
import jakarta.persistence.ManyToMany;
import jakarta.websocket.Decoder.Text;

@Entity
public class Proyek {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer Id;
    private String nama_proyek;
    private String client;
    private LocalDateTime tgl_mulai;
    private LocalDateTime tgl_selesai;
    private String pimpinan_proyek;
    private Text keterangan;
    private Timestamp create_at;

    @ManyToMany
    @JoinTable(name = "proyek_lokasi", joinColumns = @JoinColumn(name = "proyek_id"), inverseJoinColumns = @JoinColumn(name = "lokasi_id"))

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

    public LocalDateTime getTgl_mulai() {
        return tgl_mulai;
    }

    public void setTgl_mulai(LocalDateTime tgl_mulai) {
        this.tgl_mulai = tgl_mulai;
    }

    public LocalDateTime getTgl_selesai() {
        return tgl_selesai;
    }

    public void setTgl_selesai(LocalDateTime tgl_selesai) {
        this.tgl_selesai = tgl_selesai;
    }

    public String getPimpinan_proyek() {
        return pimpinan_proyek;
    }

    public void setPimpinan_proyek(String pimpinan_proyek) {
        this.pimpinan_proyek = pimpinan_proyek;
    }

    public Text getKeterangan() {
        return keterangan;
    }

    public void setKeterangan(Text keterangan) {
        this.keterangan = keterangan;
    }

    public Timestamp getCreate_at() {
        return create_at;
    }

    public void setCreate_at(Timestamp create_at) {
        this.create_at = create_at;
    }
}
