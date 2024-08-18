package com.example.demo.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.example.demo.model.Proyek;

@Repository
public interface ProyekRepo extends JpaRepository<Proyek, Integer> {

}
