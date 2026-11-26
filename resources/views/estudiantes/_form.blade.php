<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label fw-semibold">DNI *</label>
        <input type="text" name="dni" maxlength="8"
               value="{{ old('dni', $estudiante->dni) }}"
               class="form-control @error('dni') is-invalid @enderror"
               placeholder="Ej. 74859612">
        @error('dni')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Nombres *</label>
        <input type="text" name="nombres"
               value="{{ old('nombres', $estudiante->nombres) }}"
               class="form-control @error('nombres') is-invalid @enderror">
        @error('nombres')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Apellidos *</label>
        <input type="text" name="apellidos"
               value="{{ old('apellidos', $estudiante->apellidos) }}"
               class="form-control @error('apellidos') is-invalid @enderror">
        @error('apellidos')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Fecha de nacimiento *</label>
        <input type="date" name="fecha_nacimiento"
               value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento?->format('Y-m-d')) }}"
               class="form-control @error('fecha_nacimiento') is-invalid @enderror">
        @error('fecha_nacimiento')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Sexo *</label>
        <select name="sexo" class="form-select @error('sexo') is-invalid @enderror">
            <option value="">Seleccione…</option>
            <option value="F" @selected(old('sexo', $estudiante->sexo) === 'F')>Femenino</option>
            <option value="M" @selected(old('sexo', $estudiante->sexo) === 'M')>Masculino</option>
        </select>
        @error('sexo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Celular del apoderado</label>
        <input type="text" name="telefono_apoderado" maxlength="9"
               value="{{ old('telefono_apoderado', $estudiante->telefono_apoderado) }}"
               class="form-control @error('telefono_apoderado') is-invalid @enderror"
               placeholder="Ej. 987654321">
        @error('telefono_apoderado')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Dirección</label>
        <input type="text" name="direccion"
               value="{{ old('direccion', $estudiante->direccion) }}"
               class="form-control @error('direccion') is-invalid @enderror"
               placeholder="Av. / Jr. / Urb...">
        @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>