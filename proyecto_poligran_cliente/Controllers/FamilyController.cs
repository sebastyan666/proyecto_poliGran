using Microsoft.AspNetCore.Mvc;
using proyecto_poligran_cliente.Models;
using Newtonsoft.Json;

namespace proyecto_poligran_cliente.Controllers;
public class FamilyController : Controller
{
    private readonly ILogger<FamilyController> _logger;
    private HttpClient _httpClient;

    public FamilyController(ILogger<FamilyController> logger)
    {
        _logger = logger;
        _httpClient = new HttpClient();
        _httpClient.BaseAddress = new Uri("http://localhost:8000/");
    }

    public async Task<IActionResult> Index()
    {
        var users = await GetUsers();
        if (users == null)
        {
            return View("Error");
        }
        return View("Family", users);
    }

    
    public async Task<IActionResult> LaboratoryResultsByUser(int userId)
    {
        var results = await GetLaboratoryResultsByUser(userId);
        if (results == null)
        {
            return View("Error");
        }
        return PartialView("_TableLaboratoryResults", results);
    }

    public async Task<IActionResult> IndicatorsByUser(int userId)
    {
        var indicators = await GetIndicatorsByUser(userId);
        if (indicators == null)
        {
            return View("Error");
        }
        return PartialView("_TableIndicators", indicators);
    }

    public async Task<IActionResult> ControlsByUser(int userId)
    {
        var controls = await GetControlsByUser(userId);
        if (controls == null)
        {
            return View("Error");
        }
        return PartialView("_TableControls", controls);
    }

    public async Task<IActionResult> ConditionsByUser(int userId)
    {
        var conditions = await GetConditionsByUser(userId);
        if (conditions == null)
        {
            return View("Error");
        }
        return PartialView("_TableConditions", conditions);
    }

    private async Task<IEnumerable<UsuarioModel>> GetUsers()
    {
        var response = await _httpClient.GetAsync("usuarios.php");
        List<UsuarioModel> users = new List<UsuarioModel>();
        try
        {
            if (response.StatusCode != System.Net.HttpStatusCode.MethodNotAllowed)
            {
                var stringContent = await response.Content.ReadAsStringAsync();
                users = JsonConvert.DeserializeObject<List<UsuarioModel>>(stringContent);
                return users;
            }
            else
            {
                return users;
            }
        }
        catch (System.Exception ex)
        {
            _logger.LogError(ex, "Ha ocurrido un error", response);
            return users;
        }
    }


    private async Task<IEnumerable<LaboratoryResultModel>> GetLaboratoryResultsByUser(int userId)
    {
        var response = await _httpClient.GetAsync("laboratorio.php?usuario_id=" + userId);
        List<LaboratoryResultModel> laboratoryResult = new List<LaboratoryResultModel>();
        try
        {
            if (response.StatusCode != System.Net.HttpStatusCode.MethodNotAllowed)
            {
                var stringContent = await response.Content.ReadAsStringAsync();
                laboratoryResult = JsonConvert.DeserializeObject<List<LaboratoryResultModel>>(stringContent);
                return laboratoryResult;
            }
            else
            {
                return laboratoryResult;
            }
        }
        catch (System.Exception ex)
        {
            _logger.LogError(ex, "Ha ocurrido un error", response);
            return laboratoryResult;
        }
    }

    private async Task<IEnumerable<ControlModel>> GetControlsByUser(int userId)
    {
        var response = await _httpClient.GetAsync("controles.php?idusuarios=" + userId);
        List<ControlModel> controls = new List<ControlModel>();
        try
        {
            if (response.StatusCode != System.Net.HttpStatusCode.MethodNotAllowed)
            {
                var stringContent = await response.Content.ReadAsStringAsync();
                controls = JsonConvert.DeserializeObject<List<ControlModel>>(stringContent);
                return controls;
            }
            else
            {
                return controls;
            }
        }
        catch (System.Exception ex)
        {
            _logger.LogError(ex, "Ha ocurrido un error", response);
            return controls;
        }
    }

    private async Task<IEnumerable<ConditionModel>> GetConditionsByUser(int userId)
    {
        var response = await _httpClient.GetAsync("condicion.php?usuario_id=" + userId);
        List<ConditionModel> conditions = new List<ConditionModel>();
        try
        {
            if (response.StatusCode != System.Net.HttpStatusCode.MethodNotAllowed)
            {
                var stringContent = await response.Content.ReadAsStringAsync();
                conditions = JsonConvert.DeserializeObject<List<ConditionModel>>(stringContent);
                return conditions;
            }
            else
            {
                return conditions;
            }
        }
        catch (System.Exception ex)
        {
            _logger.LogError(ex, "Ha ocurrido un error", response);
            return conditions;
        }
    }

    private async Task<IEnumerable<IndicatorModel>> GetIndicatorsByUser(int userId)
    {
        var response = await _httpClient.GetAsync("indicadores.php?usuario_id=" + userId);
        List<IndicatorModel> indicators = new List<IndicatorModel>();
        try
        {
            if (response.StatusCode != System.Net.HttpStatusCode.MethodNotAllowed)
            {
                var stringContent = await response.Content.ReadAsStringAsync();
                indicators = JsonConvert.DeserializeObject<List<IndicatorModel>>(stringContent);
                return indicators;
            }
            else
            {
                return indicators;
            }
        }
        catch (System.Exception ex)
        {
            _logger.LogError(ex, "Ha ocurrido un error", response);
            return indicators;
        }
    }
}
