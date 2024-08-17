package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.demo.model.Lokasi;
import com.example.demo.service.LokasiService;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.PathVariable;

@RestController
@CrossOrigin(origins = "http://localhost:8081")
@RequestMapping("/lokasi")
public class LokasiController {

        @Autowired
        private LokasiService lokasiService;


        @PostMapping
        public ResponseEntity<Lokasi> addLokasi(@RequestBody Lokasi lokasi) {
                return ResponseEntity.ok(lokasiService.saveLokasi(lokasi));
        }

        @GetMapping
        public List<Lokasi> getAllLokasi() {
                return lokasiService.getAllLokasi();
        }

        @PutMapping("/{id}")
        public ResponseEntity<Lokasi> updateLokasi(@PathVariable Integer id, @RequestBody Lokasi lokasi) {
                lokasi.setId(id);
                return ResponseEntity.ok(lokasiService.updateLokasi(lokasi));
        }

        @DeleteMapping("/{id}")
        public void deleteLokasi(@PathVariable Integer id) {
                lokasiService.deleteById(id);
        }

        @GetMapping("/{id}")
        public Lokasi getLokasiById(@PathVariable Integer id) {
                return lokasiService.findById(id);
        }
        
}
