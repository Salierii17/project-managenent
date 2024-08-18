package com.example.demo.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.model.Proyek;
import com.example.demo.repository.ProyekRepo;

@Service
public class ProyekService {

    @Autowired
    ProyekRepo proyekRepo;

    public Proyek saveProyek(Proyek proyek) {
        return proyekRepo.save(proyek);
    }

    public List<Proyek> getAllProyek() {
        return proyekRepo.findAll();
    }

    public Proyek updateProyek(Integer id, Proyek proyek) {
        if (proyekRepo.existsById(id)) {
            proyek.setId(id);
            return proyekRepo.save(proyek);
        } else {
            throw new RuntimeException("Proyek with id " + id + " not found");
        }
    }

    public void deleteById(Integer id) {
        proyekRepo.deleteById(id);
    }

    public Proyek getProyekById(Integer id) {
        return proyekRepo.findById(id).orElseThrow(() -> new RuntimeException("Lokasi with id " + id + " not found"));
    }

}
