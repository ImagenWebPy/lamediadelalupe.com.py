<?php
$rol = $_SESSION['usuarioLogueado']['rol'];
?>
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-5">
        <h2>Administrador de contenidos</h2>
        <small>Seleccione una sección</small>
    </div>
    <?php if (($rol == 'Administrador') || ($rol == 'Editor')): ?>
        <div class="col-md-3 pull-right" style="top: 60px;">
            <p>Filtro: <a class="pointer" id="filtroFechaVisitasPagina"><span class="label label-success" id="spanfiltroFechaVisitasPagina">Seleccione un Rango de Fecha</span></a></p>
        </div>
    <?php endif; ?>
</div>
<?php if (($rol == 'Administrador') || ($rol == 'Editor')): ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Número de visitas a páginas</h5>
                    </div>
                    <div class="ibox-content altoContenedorReporte" id="visitasPaginas">
                        <p class="tex-muted">Seleccione un rango de fecha para cargar el reporte</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Cantidad de visitas por día</h5>
                    </div>
                    <div class="ibox-content altoContenedorReporte" id="cantidadVisitasDia">
                        <p class="tex-muted">Seleccione un rango de fecha para cargar el reporte</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h6>Dispositivos</h6>
                    </div>
                    <div class="ibox-content" id="dispositivos">
                        <p class="tex-muted">Seleccione un rango de fecha para cargar el reporte</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h6>Paginas/Sesión</h6>
                    </div>
                    <div class="ibox-content" id="paginas_sesion">
                        <p class="tex-muted">Seleccione un rango de fecha para cargar el reporte</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h6>Usuarios</h6>
                    </div>
                    <div class="ibox-content" id="usuarios">
                        <p class="tex-muted">Seleccione un rango de fecha para cargar el reporte</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h6>Usuarios Nuevos</h6>
                    </div>
                    <div class="ibox-content" id="usuariosNuevos">
                        <p class="tex-muted">Seleccione un rango de fecha para cargar el reporte</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h6>Sesiones</h6>
                    </div>
                    <div class="ibox-content" id="sesiones">
                        <p class="tex-muted">Seleccione un rango de fecha para cargar el reporte</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var fechaInicio = moment().subtract(7, 'days').format('YYYY-MM-DD');
            var fechaFin = moment().subtract(1, 'days').format('YYYY-MM-DD');
            //$.when(visitasPaginas("<?= URL; ?>", fechaInicio, fechaFin), dispositivos("<?= URL; ?>", fechaInicio, fechaFin));
            $('#filtroFechaVisitasPagina').daterangepicker({
                startDate: moment().subtract(7, 'days'),
                maxDate: moment().subtract(1, 'days'),
                "locale": {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    "customRangeLabel": "Personalizado",
                    "daysOfWeek": [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                },
                ranges: {
                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Últimos 7 días': [moment().subtract(7, 'days'), moment().subtract(1, 'days')],
                    'Últimos 30 días': [moment().subtract(30, 'days'), moment().subtract(1, 'days')],
                    'Este mes': [moment().startOf('month'), moment().endOf('month')],
                    'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            });
            $('#filtroFechaVisitasPagina').on('apply.daterangepicker', function (ev, picker) {
                var texto = picker.chosenLabel;
                var fechaInicio = picker.startDate.format('YYYY-MM-DD');
                var fechaFin = picker.endDate.format('YYYY-MM-DD');
                if (texto != 'Personalizado') {
                    $('#spanfiltroFechaVisitasPagina').html(texto);
                } else {
                    var formatDateStart = moment(fechaInicio).format('DD-MM-YYYY');
                    var formatDateEnd = moment(fechaFin).format('DD-MM-YYYY');
                    $('#spanfiltroFechaVisitasPagina').html(formatDateStart + ' - ' + formatDateEnd);
                }
                $.when(visitasPaginas("<?= URL; ?>", fechaInicio, fechaFin), dispositivos("<?= URL; ?>", fechaInicio, fechaFin), paginasSesion("<?= URL; ?>", fechaInicio, fechaFin), usuarios("<?= URL; ?>", fechaInicio, fechaFin), cantidadVisitasDia("<?= URL; ?>", fechaInicio, fechaFin));
            });
        });
    </script>
<?php endif; ?>