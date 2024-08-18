package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
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
@CrossOrigin(origins = "http://localhost:8082")
@RequestMapping("/proyek")
public class ProyekController {

        @Autowired
        private ProyekService proyekService;

        @PostMapping
        public ResponseEntity<Proyek> createProyek(@RequestBody Proyek proyek) {
                // Logic to save proyek
                Proyek savedProyek = proyekService.saveProyek(proyek);
                return new ResponseEntity<>(savedProyek, HttpStatus.CREATED);
        }

        @PutMapping("/{id}")
        public ResponseEntity<Proyek> updateProyek(@PathVariable Integer id, @RequestBody Proyek proyek) {
                Proyek updatedProyek = proyekService.updateProyek(id, proyek);
                return new ResponseEntity<>(updatedProyek, HttpStatus.OK);
        }

        @DeleteMapping("/{id}")
        public ResponseEntity<Void> deleteProyek(@PathVariable Integer id) {
                proyekService.deleteById(id);
                return new ResponseEntity<>(HttpStatus.NO_CONTENT);
        }

        @GetMapping
        public ResponseEntity<List<Proyek>> getAllProyek() {
                List<Proyek> proyekList = proyekService.getAllProyek();
                return new ResponseEntity<>(proyekList, HttpStatus.OK);
        }

        @GetMapping("/{id}")
        public ResponseEntity<Proyek> getProyekById(@PathVariable Integer id) {
                Proyek proyek = proyekService.getProyekById(id);
                return new ResponseEntity<>(proyek, HttpStatus.OK);
        }
}