ALTER TABLE preferencias_usuario 
ADD COLUMN cor_texto_sidebar VARCHAR(20) DEFAULT '#ffffff',
ADD COLUMN cor_fundo_pagina VARCHAR(20) DEFAULT '#f4f6fa',
ADD COLUMN modo_compacto TINYINT(1) DEFAULT 0;