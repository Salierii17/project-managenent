package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
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
        public ResponseEntity<Lokasi> Lokasi(@RequestBody Lokasi lokasi) {
            Lokasi savedLokasi = lokasiService.saveLokasi(lokasi);
            return new ResponseEntity<>(savedLokasi, HttpStatus.CREATED);
        }

        @PutMapping("/{id}")
        public ResponseEntity<Lokasi> updateLokasi(@PathVariable Integer id, @RequestBody Lokasi lokasi) {
                Lokasi updatedLokasi = lokasiService.updateLokasi(id, lokasi);
                return new ResponseEntity<>(updatedLokasi, HttpStatus.OK);
        }

        @DeleteMapping("/{id}")
        public ResponseEntity<Void> deleteLokasi(@PathVariable Integer id) {
                lokasiService.deleteLokasi(id);
                return new ResponseEntity<>(HttpStatus.NO_CONTENT);
        }

        @GetMapping
        public ResponseEntity<List<Lokasi>> getAllLokasi() {
                List<Lokasi> lokasiList = lokasiService.getAllLokasi();
                return new ResponseEntity<>(lokasiList, HttpStatus.OK);
        }

        @GetMapping("/{id}")
        public ResponseEntity<Lokasi> getLokasiById(@PathVariable Integer id) {
                Lokasi lokasi = lokasiService.getLokasiById(id);
                return new ResponseEntity<>(lokasi, HttpStatus.OK);
        }
}


