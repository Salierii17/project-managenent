package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import com.example.demo.model.Proyek;
import com.example.demo.repository.ProyekRepo;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.PathVariable;

@RestController
@RequestMapping("/proyek")
public class ProyekController {

    @Autowired
    private ProyekRepo proyekRepo;

    @PostMapping
    public Proyek addProyek(@RequestBody Proyek proyek) {
        proyekRepo.insertProyek(
                proyek.getNama_proyek(),
                proyek.getClient(),
                proyek.getTgl_mulai(),
                proyek.getTgl_selesai(),
                proyek.getPimpinan_proyek(),
                proyek.getKeterangan());
        return proyek;
    }

    @GetMapping
    public List<Proyek> getAllProyek() {
        return proyekRepo.findAll();
    }

    @GetMapping("/{id}")
    public Proyek getProyekById(@PathVariable Integer id) {
        return proyekRepo.findProyekById(id).orElseThrow();
    }

    @PutMapping("/{id}")
    public Proyek updateProyek(@PathVariable Integer id, @RequestBody Proyek proyekDetails) {
        proyekRepo.updateProyek(
                id,
                proyekDetails.getClient(),
                null, proyekDetails.getTgl_mulai(),
                proyekDetails.getTgl_selesai(),
                proyekDetails.getPimpinan_proyek(),
                proyekDetails.getKeterangan());
        return proyekDetails;
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<?> deleteProyek(@PathVariable Integer id) {
        proyekRepo.deleteProyekById(id);
        return ResponseEntity.ok().build();
    }
}
