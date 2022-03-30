namespace proyecto_poligran_cliente.Models
{
    public class IndicatorModel
    {
        public int id_salud { get; set; }
        
        public int usuario_id { get; set; }
        
        public DateTime Fecha { get; set; }
        
        public string Frecuencia_cardiaca { get; set; }
        
        public string Tension_arterial { get; set; }
        
        public string Saturacion_oxigeno { get; set; }
        
        public string Vacunas { get; set; }
        
        public int Entrenamiento { get; set; }
        
        public int Distancia_recorridas { get; set; }
        
        
    }
}