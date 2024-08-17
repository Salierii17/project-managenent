package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.demo.model.Proyek;
import com.example.demo.service.ProyekService;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.PathVariable;

@RestController
@CrossOrigin(origins = "http://localhost:8081")
@RequestMapping("/proyek")
public class ProyekController {

        @Autowired
        private ProyekService proyekService;


        @PostMapping
        public ResponseEntity<Proyek> addLokasi(@RequestBody Proyek proyek) {
                return ResponseEntity.ok(proyekService.saveProyek(proyek));
        }

        @GetMapping
        public List<Proyek> getAllLokasi() {
                return proyekService.getAllProyek();
        }

        @PutMapping("/{id}")
        public ResponseEntity<Proyek> update(@PathVariable Integer id, @RequestBody Proyek proyek) {
                proyek.setId(id);
                return ResponseEntity.ok(proyekService.updateProyek(proyek));
        }

        @DeleteMapping("/{id}")
        public void deleteLokasi(@PathVariable Integer id) {
        }

        @GetMapping("/{id}")
        public Proyek getLokasiById(@PathVariable Integer id) {
                return proyekService.findById(id);
        }
        
}
