package com.example.demo.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.example.demo.model.Lokasi;

@Repository
public interface LokasiRepo extends JpaRepository<Lokasi, Integer> {

}
