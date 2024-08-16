package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import com.example.demo.model.Lokasi;
import com.example.demo.repository.LokasiRepo;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.PathVariable;

@RestController
@RequestMapping("Lokasi")
public class LokasiController {

        @Autowired
        private LokasiRepo lokasiRepo;

        @PostMapping
        public Lokasi addLokasi(@RequestBody Lokasi lokasi) {
                lokasiRepo.insertLokasi(
                                lokasi.getNama_lokasi(),
                                lokasi.getNegara(),
                                lokasi.getProvinsi(),
                                lokasi.getKota());
                return lokasi;
        }

        @GetMapping
        public List<Lokasi> getAllLokasi() {
                return lokasiRepo.findAll();
        }

        @PutMapping("/{id}")
        public Lokasi updateLokasi(@PathVariable Integer id, @RequestBody Lokasi lokasiDetail) {
                lokasiRepo.updateLokasi(
                                id,
                                lokasiDetail.getNama_lokasi(),
                                lokasiDetail.getNegara(),
                                lokasiDetail.getProvinsi(),
                                lokasiDetail.getKota());
                return lokasiDetail;
        }

        @DeleteMapping("/{id}")
        public ResponseEntity<?> deleteLokasi(@PathVariable Integer id) {
                lokasiRepo.deleteLokasiById(id);
                return ResponseEntity.ok().build();
        }

}
