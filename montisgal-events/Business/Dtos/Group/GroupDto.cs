namespace montisgal_events.Business.Dtos.Group;

public class GroupDto
{
    public Guid Id { get; set; }
    
    public string Name { get; set; }

    public string Description { get; set; }

    public bool IsPublic { get; set; }
}