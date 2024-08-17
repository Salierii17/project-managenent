package com.example.demo.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.model.Lokasi;
import com.example.demo.repository.LokasiRepo;

@Service
public class LokasiService {

    @Autowired
    LokasiRepo lokasiRepo;

    public Lokasi saveLokasi(Lokasi lokasi) {
        return lokasiRepo.save(lokasi);
    }

    public List<Lokasi> getAllLokasi() {
        return lokasiRepo.findAll();
    }

    public Lokasi updateLokasi(Lokasi lokasi) {
        return lokasiRepo.save(lokasi);
    }

    public void deleteById(Integer id) {
        lokasiRepo.deleteById(id);
    }

    public Lokasi findById(Integer id) {
        return lokasiRepo.findById(id).orElseThrow();
    }


}
