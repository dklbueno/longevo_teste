-- Table: public.cliente

-- DROP TABLE public.cliente;

CREATE TABLE public.cliente
(
    id_cliente serial NOT NULL,
    name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    email character varying(255) COLLATE pg_catalog."default" NOT NULL,
    created_at timestamp(0) without time zone NOT NULL DEFAULT now(),
    updated_at timestamp(0) without time zone NOT NULL DEFAULT now(),
    CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente)
);

-- Table: public.chamado

-- DROP TABLE public.chamado;

CREATE TABLE public.chamado
(
    id serial NOT NULL,
    id_pedido integer NOT NULL,
    created_at timestamp(0) without time zone NOT NULL DEFAULT now(),
    updated_at timestamp(0) without time zone NOT NULL DEFAULT now(),
    title character varying(255) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT chamado_pkey PRIMARY KEY (id)
);

-- Table: public.pedido

-- DROP TABLE public.pedido;

CREATE TABLE public.pedido
(
    id serial NOT NULL,
    created_at timestamp(0) without time zone NOT NULL DEFAULT now(),
    updated_at timestamp(0) without time zone NOT NULL DEFAULT now(),
    title character varying(255) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default",
    id_cliente integer NOT NULL,
    CONSTRAINT pedido_pkey PRIMARY KEY (id),
    CONSTRAINT fk_c4ec16ce2a813255 FOREIGN KEY (id_cliente)
        REFERENCES public.cliente (id_cliente) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

