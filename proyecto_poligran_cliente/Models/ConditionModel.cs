namespace proyecto_poligran_cliente.Models
{
    public class ConditionModel
    {
        public string id { get; set; }

        public int R_laboratorio_id { get; set; }
        
        public string Condicion { get; set; }
        
        public string Tipo { get; set; }
        
        public DateTime Fecha_inicio { get; set; }
        
        public string Observaciones { get; set; }
        
        public int usuario_id { get; set; }
    }
}