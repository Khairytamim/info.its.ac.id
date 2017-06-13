/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     13/06/2017 11.38.51                          */
/*==============================================================*/


drop table if exists data;

drop table if exists jawaban;

drop table if exists organisasi;

drop table if exists pertanyaan;

/*==============================================================*/
/* Table: data                                                  */
/*==============================================================*/
create table data
(
   id_data              int(24) not null,
   id_jawaban           int(24),
   data                 varchar(1024),
   tanggal_data         timestamp,
   primary key (id_data)
);

/*==============================================================*/
/* Table: jawaban                                               */
/*==============================================================*/
create table jawaban
(
   id_pertanyaan        int(24) not null,
   id_jawaban           int(24) not null,
   jawaban              varchar(1024),
   tipe_jawaban         int(1),
   status               int(1),
   tanggal_jawaban      timestamp,
   primary key (id_jawaban)
);

/*==============================================================*/
/* Table: organisasi                                            */
/*==============================================================*/
create table organisasi
(
   id_organisasi        int(24) not null,
   organisasi           varchar(1024),
   primary key (id_organisasi)
);

/*==============================================================*/
/* Table: pertanyaan                                            */
/*==============================================================*/
create table pertanyaan
(
   id_pertanyaan        int(24) not null,
   pertanyaan           varchar(1024),
   tanggal_pertanyaan   timestamp,
   primary key (id_pertanyaan)
);

alter table data add constraint fk_reference_2 foreign key (id_jawaban)
      references jawaban (id_jawaban) on delete restrict on update restrict;

alter table jawaban add constraint fk_reference_1 foreign key (id_pertanyaan)
      references pertanyaan (id_pertanyaan) on delete restrict on update restrict;

