package com.example.demo.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.model.Lokasi;
import com.example.demo.repository.LokasiRepo;

@Service
public class LokasiService {

     @Autowired
    private LokasiRepo lokasiRepo;

    public Lokasi saveLokasi(Lokasi lokasi) {
        return lokasiRepo.save(lokasi);
    }

    public List<Lokasi> getAllLokasi() {
        return lokasiRepo.findAll();
    }

    public Lokasi updateLokasi(Integer id, Lokasi lokasi) {
        if (lokasiRepo.existsById(id)) {
            lokasi.setId(id); // Ensure the ID is set on the entity
            return lokasiRepo.save(lokasi);
        } else {
            throw new RuntimeException("Lokasi with id " + id + " not found");
        }
    }

    public void deleteLokasi(Integer id) {
        if (lokasiRepo.existsById(id)) {
            lokasiRepo.deleteById(id);
        } else {
            throw new RuntimeException("Lokasi with id " + id + " not found");
        }
    }

    public Lokasi getLokasiById(Integer id) {
        return lokasiRepo.findById(id).orElseThrow(() -> new RuntimeException("Lokasi with id " + id + " not found"));
    }

    // @Autowired
    // LokasiRepo lokasiRepo;

    // public Lokasi saveLokasi(Lokasi lokasi) {
    //     return lokasiRepo.save(lokasi);
    // }

    // public List<Lokasi> getAllLokasi() {
    //     return lokasiRepo.findAll();
    // }

    // public Lokasi updateLokasi(Lokasi lokasi) {
    //     return lokasiRepo.save(lokasi);
    // }

    // public void deleteById(Integer id) {
    //     lokasiRepo.deleteById(id);
    // }

    // public Lokasi findById(Integer id) {
    //     return lokasiRepo.findById(id).orElseThrow();
    // }


}
