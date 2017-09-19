using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Data;
using System.Data.SqlClient;
using MySql.Data.MySqlClient;

namespace WS_BD_Integracion_2017
{
    /// <summary>
    /// Descripción breve de WS_Integracion_2017
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
    // [System.Web.Script.Services.ScriptService]
    public class WS_Integracion_2017 : System.Web.Services.WebService
    {
        [WebMethod]
        public string HelloWorld()
        {
            return "Hello World";
        }

        [WebMethod]
        public DataSet DatosIncidente()
        {
            string sConnection;
            sConnection = "server=localhost;uid=root;pwd=;database=denuncias;";
            MySqlConnection con = new MySqlConnection(sConnection);
            con.Open();
            MySqlDataAdapter query = new MySqlDataAdapter("SELECT * FROM incidentes", con);
            DataSet datos = new DataSet("incidentes");
            query.FillSchema(datos, SchemaType.Source, "incidentes");
            query.Fill(datos, "incidentes");
            con.Close();
            return datos;
        }

        [WebMethod]
        public DataSet Categoria_Accidente()
        {
            string sConnection;
            sConnection = "server=localhost;uid=root;pwd=;database=denuncias;";
            MySqlConnection con = new MySqlConnection(sConnection);
            con.Open();
            MySqlDataAdapter query = new MySqlDataAdapter("SELECT TIPO FROM incidentes WHERE(TIPO IN('Colisión Vehicular','Choque múltiple','Incendio','Derrumbes','Atropello de peatones'))",con);
            DataSet datos = new DataSet("incidentes");
            query.FillSchema(datos, SchemaType.Source, "incidentes");
            query.Fill(datos, "incidentes");
            con.Close();
            return datos;
        }
    }
}
